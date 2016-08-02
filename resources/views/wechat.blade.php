<html5>
    hello wechat!!!
    <script>
        var imageDiff = require('image-diff');
        console.log(imageDiff);
        imageDiff({
            actualImage: 'checkerboard.png',
            expectedImage: 'white.png',
            diffImage: 'difference.png',
        }, function (err, imagesAreSame) {
            // error will be any errors that occurred
            // imagesAreSame is a boolean whether the images were the same or not
            // diffImage will have an image which highlights differences
        });

    </script>
</html5>