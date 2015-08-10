var request = require('request');
var cheerio = require('cheerio');

var events = [];

request('http://www.giantbomb.com/', function (error, response, html) {
    if (!error && response.statusCode == 200) {
        var $ = cheerio.load(html);
        var upcomingPromo = $('.promo-upcoming');
        if(upcomingPromo.length) {
            upcomingPromo.find('dd').each(function(i, element){
             events.push(getObjectFromEventElement($, $(element)));
            });
        }
        console.log(JSON.stringify(events));
    } else {
        process.exit(1);
    }
});

function getObjectFromEventElement($, element)
{
    return {
        imageUrl: getImageUrl(),
        title: getTitle(),
        date: getDate(),
        premium: isPremium()
    };

    function isPremium()
    {
        return ($(element).find('.premium-tag').length > 0)
    }

    function getDate()
    {
        return $(element).find('.time').text().trim()
    }

    function getTitle()
    {
        return $(element).find('.title').text()
    }

    function getImageUrl()
    {
        var backgroundImage = ($(element).css('background-image'));
        if(backgroundImage != "undefined") {
            var regex = /url\((.+)\)/;
            var match = regex.exec(backgroundImage);
            if(match != null) {
                return match[1];
            }
        }
        return null;
    }
}