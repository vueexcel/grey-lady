<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href='{{ backpack_url('parseerror') }}'><i class='fa fa-tag'></i> <span>Parse Errors</span></a></li>
<!-- Users, Roles Permissions -->
  <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
      <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
      <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
  </li>
<li><a href='{{ backpack_url('listingstream') }}'><i class='fa fa-tag'></i> <span>Listing Stream</span></a></li>
<li><a href='{{ backpack_url('newsandupdates') }}'><i class='fa fa-tag'></i> <span>News And Updates</span></a></li>
<li><a href='{{ backpack_url('deals') }}'><i class='fa fa-tag'></i> <span>Deals</span></a></li>