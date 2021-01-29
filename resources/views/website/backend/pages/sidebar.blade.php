<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="index2.html">Farmer Dashboard</a></li>
            <li><a href="index3.html">Costumer Dashboard</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Category<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          {{-- <li><a href="{{route('category.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Category</a></li> --}}
            <li><a href="{{route('category.index')}}"><i class="glyphicon glyphicon-eye-open"></i> View Category</a></li>
          </ul>
        </li>
        <li><a><i class="glyphicon glyphicon-th-list"></i>  Product <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('product.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Products</a></li>
            <li><a href="{{route('product.index')}}"><i class="glyphicon glyphicon-eye-open"></i> ViewProducts</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Order Table <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('ordertable.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add OrderTables</a></li>
            <li><a href="{{route('ordertable.index')}}"><i class="glyphicon glyphicon-eye-open"></i> View OrderTable </a></li>
          </ul>
        </li>
        <li><a><i class="glyphicon glyphicon-credit-card"></i>  Payment <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('payment.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Payment</a></li>
            <li><a href="{{route('payment.index')}}"><i class="glyphicon glyphicon-eye-open"></i> View Payment Details</a></li>
          </ul>
        </li>
        <li><a><i class="glyphicon glyphicon-user"></i> Farmer <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('farmer.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Farmer</a></li>
            <li><a href="{{route('farmer.index')}}"> <i class="glyphicon glyphicon-eye-open"></i> View Farmer</a></li>
          </ul>
        </li>

        <li><a><i class="glyphicon glyphicon-user"></i> Customer <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('customer.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Customer</a></li>
          <li><a href="{{route('customer.index')}}"><i class="glyphicon glyphicon-eye-open"></i> View Customer</a></li>
          </ul>
        </li>

        <li><a><i class="glyphicon glyphicon-stats"></i>  Transactions<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('transaction.create')}}"><i class="glyphicon glyphicon-pencil"></i> Add Transaction</a></li>
            <li><a href="{{route('transaction.index')}}"><i class="glyphicon glyphicon-eye-open"></i> View Transactions</a></li>
          </ul>
        </li>
      </ul>
    </div>
    

  </div>