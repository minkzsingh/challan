<!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
<div class="logo">
    <a class="simple-text logo-mini">
        <div class="logo-image-small">
            <img src="{{asset('images/n.png')}}">
        </div>
    </a>
    <a href="{{url('/')}}" class="simple-text logo-normal">
        Munday Ind.
        <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="active ">
            <a href="{{route('dashboard')}}">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="{{route('item')}}">
                <i class="nc-icon nc-diamond"></i>
                <p>Item</p>
            </a>
        </li>
        <li>
            <a href="{{route('company')}}">
                <i class="nc-icon nc-pin-3"></i>
                <p>Company</p>
            </a>
        </li>
        <li>
            <a href="{{route('challan')}}">
                <i class="nc-icon nc-bell-55"></i>
                <p>Challan List</p>
            </a>
        </li>
        <li>
            <a href="{{route('challan_create')}}">
                <i class="nc-icon nc-bell-55"></i>
                <p>Challan</p>
            </a>
        </li>
    </ul>
</div>