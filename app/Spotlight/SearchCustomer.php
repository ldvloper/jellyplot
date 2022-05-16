<?php

namespace App\Spotlight;

use App\Models\Customer;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;
use LivewireUI\Spotlight\SpotlightCommandDependencies;
use LivewireUI\Spotlight\SpotlightCommandDependency;
use LivewireUI\Spotlight\SpotlightSearchResult;

class SearchCustomer extends SpotlightCommand
{
    /**
     * This is the name of the command that will be shown in the Spotlight component.
     */
    protected string $name = 'Search Customer';

    /**
     * This is the description of your command which will be shown besides the command name.
     */
    protected string $description = "Redirects to customer's page";


    /**
     * Defining dependencies is optional. If you don't have any dependencies you can remove this method.
     * Dependencies are asked from your user in the order you add the dependencies.
     */
    public function dependencies(): ?SpotlightCommandDependencies
    {
        return SpotlightCommandDependencies::collection()
            ->add(
            // In this example we will register a 'customer' dependency
                SpotlightCommandDependency::make('customer')
                    // The default Spotlight placeholder will be changed to your dependency place holder
                    ->setPlaceholder('Please enter the customer name you want to look for')
            );
    }


    /**
     * Spotlight will resolve dependencies by calling the search method followed by your dependency name.
     * The method will receive the search query as the parameter.
     */
    public function searchCustomer($query)
    {
        $department = null;
        if(auth()->user()->department && !auth()->user()->master){
            $department = auth()->user()->department_id;
        }

        return Customer::query()->when($department, function($queryDepartment) use ($department) {
            $queryDepartment->where('department_id', $department);
        })->where('name', 'ilike', "%$query%")
            ->get()
            ->map(function(Customer $customer) {
                // You must map your search result into SpotlightSearchResult objects
                return new SpotlightSearchResult(
                    $customer->id,
                    $customer->name,
                    sprintf('Go to customer page %s', $customer->name)
                );
            });
    }

    /**
     * When all dependencies have been resolved the execute method is called.
     * You can type-hint all resolved dependency you defined earlier.
     */
    public function execute(Spotlight $spotlight, Customer $customer)
    {
        $spotlight->redirectRoute('customers.show', $customer);
    }

    /**
     * You can provide any custom logic you want to determine whether the
     * command will be shown in the Spotlight component. If you don't have any
     * logic you can remove this method. You can type-hint any dependencies you
     * need and they will be resolved from the container.
     */
    public function shouldBeShown(): bool
    {
        return true;
    }
}
