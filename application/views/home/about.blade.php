@layout('layouts/main')
 
@section('navigation')
@parent

<!--     <li><a href="about">About</a></li>  -->
    
@endsection
 
@section('content')
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Navigation</li>
                @foreach ($sidenav as $sn)
                
                    <li @if ($sn['active']) class="active" @endif> 
                    <a href="{{ $sn['url'] }}">{{ $sn['name'] }}</a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
    <div class="span9">
        <h1>About MyApp</h1>

        <p>In short, MyApp is a modular, extensible web application.  The views we publish are optimized for using mobile devices, but we aim to provide a rich experience on all devices. This is a distinct although not entirely new approach to traditional web development.  This struture is intented to promote easy of use for any particular end-user. By design, the project is brandable and useful for multiple industries.</p>
        <p>The product was born from an effort to meet the needs of the Real Estate Agent, the example below will use Real Estate as a model, but the principles and tools can be applied to any industry.</p> 
        <p>Here is an example of one of our features:</p>
        
        <h3>MyCard</h3>
        <p>MyCard is like a custom business card, but viewable on a smartphone.  The object looks like a business card when viewed on a smartphone, but also contains links, facebook content, twitter content, and more.  Users (customers, networking contacts, etc.) can scan a QR code from printed material, or visit a link to your MyApp landing page, and then add you to their life as they see fit.  If they ever need you again, they will have 8 ways to get in touch with you...</p>
        <p><i>But couldn't I just do that with my existing... {webpage, facebook, linkedin, etc.}?</i></p>
        
        <h3>Yes, but is it simple?</h3>
        
        <p>In programming terms, MyApp seeks to abstract the physical user as an object, and simplify the implemetation of that object from other parts of "the system".  </p>

        <p>Our system is a simple link to these other, existing content sources.  Each of these tools (Facebook, Twitter, and The Real-Estate Company Website, for example) </p>

        <h3>Document Sharing</h3>

        <p></p>

        <h3>Temporary</h3>
        <p>
            Please note that file storage is <i>temporary</i>.  MyApp is a connector: we simply help you connect with and share content from your other services.  
        </p>

<h3>Password Managment</h3>
<p>
    I myself am concerned about storing all of my passwords in one place.  However, password managment is one important but annoying task and security concern that needs to be constantly scrutenized.  Systems are under discussion which will 
</p>

    </div>
</div>
@endsection