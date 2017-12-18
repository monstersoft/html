$("#btn-save").click( function() {
    saveAs('hahah','jsjsjsjs.csv');
function saveAs(content, name) {
	const isBlob = typeof content.type === 'string';

	const link = Object.assign(window.document.createElement('a'), {
		download: name,
		target: '_blank', // fallback
		href: isBlob ? window.URL.createObjectURL(content) : content,
	});
	clickElement.call(window, link);
	isBlob && global.setTimeout(function() { window.URL.revokeObjectURL(link.href); }, 1000);
};

function clickElement(element) {
	const evt = window.document.createEvent('MouseEvents');
	evt.initEvent('click', true, true);
	element.dispatchEvent(evt);
	return element;
}
});