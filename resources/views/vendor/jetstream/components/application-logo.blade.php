<a href="{{route('dashboard')}}">
    @if(config('app.icon'))
        <img alt="{{config('app.name')}} favicon" src="{{asset(config('app.icon'))}}" class="{{config('app.icon_class')}}" style="{{config('app.icon_style')}}">
    @else
        <svg id="a" class="h-12" style="{{config('app.icon_style')}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1704.64 1851"><defs><style>.f{fill:#8a3bfc;stroke:#000;stroke-miterlimit:10;}</style></defs><rect id="b" class="f" x="419.55" y="10.02" width="390.48" height="1840.48" rx="195.24" ry="195.24"/><rect id="c" class="f" x=".5" y="1379.07" width="369.05" height="471.43" rx="184.52" ry="184.52"/><rect id="d" class="f" x="873.18" y=".5" width="390.48" height="1840.48" rx="195.24" ry="195.24"/><rect id="e" class="f" x="1313.66" y="10.02" width="390.48" height="890.65" rx="195.24" ry="195.24"/></svg>
    @endif
</a>

