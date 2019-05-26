@if (count(Nova::availableResources(request())))
    @foreach (\Opanegro\DotNovaSidebarCollapse\NovaCategorise::availableResourcesGrouped(request()) as $group => $resources)
        <dot-nova-sidebar-collapse
            header="{{ $group }}"
            header-icon="{{ \Opanegro\DotNovaSidebarCollapse\NovaCategorise::headerIcon($resources) }}"
            resources-uri="{{ \Opanegro\DotNovaSidebarCollapse\NovaCategorise::resourceUriKeysBoolean($resources) }}"
            :last="@json($loop->last)"
        >
            @foreach ($resources as $key => $resource)
                <li class="leading-wide mb-4 text-sm" key="{{ $key }}">
                    <router-link :to="{
                    name: 'index',
                    params: {
                        resourceName: '{{ $resource::uriKey() }}'
                    }
                }" class="text-{{ config('dot-nova-sidebar-collapse.type_theme') == 'dark' ? 'white' : 'black' }} ml-8 no-underline dim">
                        {{ $resource::label() }}
                    </router-link>
                </li>
            @endforeach
        </dot-nova-sidebar-collapse>
    @endforeach
@endif
