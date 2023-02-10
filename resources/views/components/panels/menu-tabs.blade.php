<li><a class="{{ request()->is('about') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('about') }}">О компании</a></li>
<li><a class="{{ request()->is('contacts') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}"      href="{{ route('contacts') }}">Контактная информация</a></li>
<li><a class="{{ request()->is('sales-terms') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('sales-terms') }}">Условия продаж</a></li>
<li><a class="{{ request()->is('finance-department') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('finance-department') }}">Финансовый отдел</a></li>
<li><a class="{{ request()->is('for-clients') ? 'text-orange cursor-default' :  'text-gray-600 hover:text-orange'}}" href="{{ route('for-clients') }}">Для клиентов</a></li>
