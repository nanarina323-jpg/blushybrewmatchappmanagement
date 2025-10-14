@include('layout.header')
<h2>New Drink Notification</h2>
    <p>Hello Admin,</p>
    <p>A new drink has been added:</p>

    <ul>
        <li><strong>Name:</strong> {{ $drink->flavourname }}</li>
        <li><strong>Code:</strong> {{ $drink->code }}</li>
        <li><strong>Added by:</strong> {{ $user }}</li>
    </ul>

    <p>Time: {{ now() }}</p>
@include('layout.footer')