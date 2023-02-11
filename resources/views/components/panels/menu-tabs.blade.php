<li><a class="{{ request()->routeIs('about') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('about') }}">О компании</a></li>
<li><a class="{{ request()->routeIs('contacts') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}"      href="{{ route('contacts') }}">Контактная информация</a></li>
<li><a class="{{ request()->routeIs('sales-terms') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('sales-terms') }}">Условия продаж</a></li>
<li><a class="{{ request()->routeIs('finance-department') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('finance-department') }}">Финансовый отдел</a></li>
<li><a class="{{ request()->routeIs('for-clients') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('for-clients') }}">Для клиентов</a></li>
