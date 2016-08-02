var imageDiff = require('image-diff');
        imageDiff({
            actualImage: 'difference.png',
            expectedImage: 'difference-2.png',
            diffImage: 'difference-3.png',
        }, function (err, imagesAreSame) {
            console.log(err);
            console.log(imagesAreSame);
            // error will be any errors that occurred
            // imagesAreSame is a boolean whether the images were the same or not
            // diffImage will have an image which highlights differences
        });
