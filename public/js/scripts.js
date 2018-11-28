var text = 'Send us an email';

var createLetterArray = function createLetterArray(string) {
	return string.split('');
};

var createLetterLayers = function createLetterLayers(array) {
	return array.map(function (letter) {
		var layer = '';
		for (var i = 1; i <= 2; i++) 
		{
			if (letter == ' ') {
				layer += '<span class="space"></span>';
			}
			else {
				layer += '<span class="letter-' + i + '">' + letter + '</span>';
			}
		}
		return layer;
	});
};

var createLetterContainers = function createLetterContainers(array) {
	return array.map(function (item) {
		var container = '';
		container += '<div class="wrapper">' + item + '</div>';
		return container;
	});
};

var outputLayers = new Promise(function (resolve, reject) {
	document.getElementById('text').innerHTML = createLetterContainers(createLetterLayers(createLetterArray(text))).join('');
	resolve();
});

var spans = Array.prototype.slice.call(document.getElementsByTagName('span'));
outputLayers.then(function () {
	return spans.map(function (span) {
		setTimeout(function () {
			  span.parentElement.style.width = span.offsetWidth + 'px';
			  span.parentElement.style.height = span.offsetHeight + 'px';
		}, 250);
	});
}).then(function () {
	var time = 250;
	return spans.map(function (span) {
		time += 75;
		setTimeout(function () {
			span.parentElement.style.top = '0px';
		}, time);
	});
});