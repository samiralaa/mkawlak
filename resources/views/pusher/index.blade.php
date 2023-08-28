<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('a58021079afa768e15ff', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('user-offer-' + 1);
        channel.bind('offer', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</body>
