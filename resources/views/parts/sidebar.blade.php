<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if(auth()->user())
      {{-- @if(auth()->user()->role == 'user' || auth()->user()->role == 'approver') --}}
        <x-sidebar.user-sidebar />
        @if(auth()->user()->role == 'admin')
        <x-sidebar.admin-sidebar />
      @endif
      @endif
    </ul>

</aside>
