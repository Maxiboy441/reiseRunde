<x-head/>
<x-nav-bar/>
<x-trip-list :trips="$trips"/>
<div class="mt-10 mb-5 mr-5">{{ $trips->appends(Request::except('page'))->links() }}</div>
<x-footer/>
