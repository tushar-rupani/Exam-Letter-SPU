// var doc = new jsPDF();
// var specialElementHandlers = {
//     '#editor': function (element, renderer) {
//         return true;
//     }
// };

// $('#cmd').click(function () {
//     doc.fromHTML($('#content').html(), 15, 15, {
//         'width': 170,
//             'elementHandlers': specialElementHandlers
//     });
//     doc.save('sample-file.pdf');
// });
const button = document.getElementById('cmd');
function generatePDF() {
    // Choose the element that your content will be rendered to.
    const element = document.getElementById('content');
    // Choose the element and save the PDF for your user.
    html2pdf().from(element).save();
}
button.addEventListener('click', generatePDF);