@component('mail::message')
# Introduction

Welcome to AdvancedBlog/CMS

Thank you for signing up **we really appreciate it**

@component('mail::button', ['url' => route('root')])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
