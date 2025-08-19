<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
>
  <!-- SIDEBAR HEADER -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
    class="flex items-center gap-2 pt-8 sidebar-header pb-7"
  >
    <a href="#">
      <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
        <img
          class="dark:hidden"
          src="{{ asset('assets/images/logo/logo.svg') }}"
          alt="Logo"
        />
        <img
          class="hidden dark:block"
          src="{{ asset('assets/images/logo/logo-dark.svg') }}"
          alt="Logo"
        />
      </span>

      <img
        class="logo-icon"
        :class="sidebarToggle ? 'lg:block' : 'hidden'"
        src="{{ asset('assets/images/logo/logo-icon.svg') }}"
        alt="Logo"
      />
    </a>
  </div>
  <!-- SIDEBAR HEADER -->

  <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
    <!-- Sidebar Menu -->
    <nav x-data="{selected: $persist('Dashboard')}">
      <h3
        class="mb-4 text-xs uppercase leading-[20px] text-gray-400"
        :class="sidebarToggle ? 'lg:hidden' : ''"
      >
        Menu
      </h3>

      <ul class="flex flex-col gap-4 mb-6">
        <!-- Dashboard -->
        <li>
          <a href="/admin/dashboard" class="menu-item group menu-item-active">
            <i class="bx bx-grid-alt menu-item-icon-active text-2xl"></i>
            <span class="menu-item-text">Dashboard</span>
          </a>
        </li>

        <!-- User -->
        <li>
          <a href="/admin/users" class="menu-item group">
            <i class="bx bx-user menu-item-icon-inactive text-2xl"></i>
            <span class="menu-item-text">User</span>
          </a>
        </li>

        <!-- Role & Permission with Dropdown -->
        <li>
          <a
            href="#"
            @click.prevent="selected = (selected === 'Role' ? '' : 'Role')"
            class="menu-item group"
            :class="(selected === 'Role') ? 'menu-item-active' : 'menu-item-inactive'"
          >
            <i
              class="bx bx-lock-alt"
              :class="(selected === 'Role') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
              style="font-size: 24px;"
            ></i>

            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
              Role & Permission
            </span>

            <!-- Arrow -->
            <i
              class="bx bx-chevron-down absolute right-2.5 top-1/2 -translate-y-1/2"
              :class="[
                (selected === 'Role')
                  ? 'menu-item-arrow-active'
                  : 'menu-item-arrow-inactive',
                sidebarToggle ? 'lg:hidden' : ''
              ]"
              style="font-size: 20px;"
            ></i>
          </a>

          <!-- Dropdown Menu -->
          <div
            class="overflow-hidden transform translate"
            :class="(selected === 'Role') ? 'block' : 'hidden'"
          >
            <ul
              :class="sidebarToggle ? 'lg:hidden' : 'flex'"
              class="flex flex-col gap-1 mt-2 menu-dropdown pl-9"
            >
              <li>
                <a
                  href="/admin/roles"
                  class="menu-dropdown-item group"
                  :class="page === 'roles' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                >
                  Roles
                </a>
              </li>
              <li>
                <a
                  href="/admin/permissions"
                  class="menu-dropdown-item group"
                  :class="page === 'permissions' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                >
                  Permissions
                </a>
              </li>
              <li>
                <a
                  href="/admin/assign"
                  class="menu-dropdown-item group"
                  :class="page === 'assign' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                >
                  Assign Role
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Role & Permission -->
      </ul>
    </nav>
    <!-- Sidebar Menu -->
  </div>
</aside>