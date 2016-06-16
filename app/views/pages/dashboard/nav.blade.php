<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="{{URL::action('DashboardController@getEditTags')}}">Dashboard</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="{{URL::to('logout')}}">Logout</a></li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="{{URL::action('DashboardController@getEditTags')}}">Tags</a></li>
      <li><a href="{{URL::action('DashboardController@getEditTextFilter')}}">Text Filter</a></li>
    </ul>
  </section>
</nav>