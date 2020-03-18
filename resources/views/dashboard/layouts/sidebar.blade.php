<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="menu-sidebar"><a href="{{ url('/dashboard') }}"><span class="fa fa-google-wallet"></span>Beranda Dashboard</span></a></li>
        
         <li class="menu-sidebar"><a href="{{ url('/biodata') }}"><span class="fa fa-google-wallet"></span>Biodata</span></a></li>

         <li class="menu-sidebar"><a href="{{ url('/verifikasi') }}"><span class="fa fa-google-wallet"></span>Verifikasi</span></a></li>

         <li class="menu-sidebar"><a href="{{ url('/peserta') }}"><span class="fa fa-google-wallet"></span>Data Peserta</span></a></li>
  
        <li class="header">OTHER</li>

        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>