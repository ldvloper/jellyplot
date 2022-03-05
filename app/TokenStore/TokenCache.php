<?php

namespace App\TokenStore;

use App\Models\User;
use App\Models\Department;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class TokenCache {
    public function storeTokens($accessToken, $user) {

        /**
        * Creates the user with a random string
        * password in order to don't allow the user normal login
        */

        $userCreated = User::firstOrCreate([
            'email' => $user->getMail(),
        ],[
            'name' => $user->getDisplayName(),
            'password' => null,
            'microsoft_user' => true,
        ]);

        //Get the ID to create a personal team
        $id = $userCreated->id;
        //Verifying the email
        $userCreated->markEmailAsVerified();

        //Adding space if the user don't have one
        $userCreated->ownedTeams()->save(Team::firstOrNew([
            'personal_team' => true,
            'user_id' => $id,
        ],[
            'name' => explode(' ', $userCreated->name, 2)[0]."'s Space",
        ]));


        session([
            'accessToken' => $accessToken->getToken(),
            'refreshToken' => $accessToken->getRefreshToken(),
            'tokenExpires' => $accessToken->getExpires(),
            'userId' => $user->getId(),
            'userName' => $user->getDisplayName(),
            'userFirstName' => $user->getGivenName(),
            'userSurname' => $user->getSurname(),
            'userEmail' => null !== $user->getMail() ? $user->getMail() : $user->getUserPrincipalName(),
            'userOfficeLocation' => $user->getOfficeLocation(),
            'userMobilePhone' => $user->getMobilePhone(),
            'userJobTitle' => $user->getJobTitle(),
            'user' => $user,
        ]);

        Auth::login($userCreated, true);
    }

    public function clearTokens() {
        //Update the user status
        session()->forget('accessToken');
        session()->forget('refreshToken');
        session()->forget('tokenExpires');
        session()->forget('userName');
        session()->forget('userEmail');
        session()->forget('userTimeZone');

        return redirect()->route('logout');
    }


    // <GetAccessTokenSnippet>
    public function getAccessToken() {
        // Check if tokens exist
        if (empty(session('accessToken')) ||
            empty(session('refreshToken')) ||
            empty(session('tokenExpires'))) {
            return '';
        }

        // Check if token is expired
        //Get current time + 5 minutes (to allow for time differences)
        $now = time() + 300;
        if (session('tokenExpires') <= $now) {
            // Token is expired (or very close to it)
            // so let's refresh

            // Initialize the OAuth client
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => config('azure.appId'),
                'clientSecret'            => config('azure.appSecret'),
                'redirectUri'             => config('azure.redirectUri'),
                'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
                'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
                'urlResourceOwnerDetails' => '',
                'scopes'                  => config('azure.scopes')
            ]);

            try {
                $newToken = $oauthClient->getAccessToken('refresh_token', [
                    'refresh_token' => session('refreshToken')
                ]);

                // Store the new values
                $this->updateTokens($newToken);

                return $newToken->getToken();
            }
            catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                return '';
            }
        }

        // Token is still valid, just return it
        return session('accessToken');
    }
    // </GetAccessTokenSnippet>

    // <UpdateTokensSnippet>
    public function updateTokens($accessToken) {
        session([
            'accessToken' => $accessToken->getToken(),
            'refreshToken' => $accessToken->getRefreshToken(),
            'tokenExpires' => $accessToken->getExpires()
        ]);
    }
    // </UpdateTokensSnippet>

}
