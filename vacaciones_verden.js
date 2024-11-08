function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e){
            const reader = new FileReader();
            reader.onload = function(event){
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

window.addEventListener('load', async () => {

    const form = document.querySelector('#form_v');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let fechasol = document.getElementById('fechasol').value;
        let nombre = document.getElementById('nombre').value;
        let dptto = document.getElementById('dptto').value;
        let fechaing = document.getElementById('fechaing').value;
        let numeroemp = document.getElementById('numeroemp').value;
        let puesto = document.getElementById('puesto').value;
        let dia1 = document.getElementById('dia1').value;
        let mes1 = document.getElementById('mes1').value;
        let año1 = document.getElementById('año1').value;
        let dia2 = document.getElementById('dia2').value;
        let mes2 = document.getElementById('mes2').value;
        let año2 = document.getElementById('año2').value;
        let dia3 = document.getElementById('dia3').value;
        let mes3 = document.getElementById('mes3').value;
        let año3 = document.getElementById('año3').value;
       

        generatePDF(fechasol, nombre, dptto, fechaing, numeroemp, puesto, dia1, mes1, año1, dia2, mes2, año2, dia3, mes3, año3);
    })

});

async function generatePDF(fechasol, nombre, dptto, fechaing, numeroemp, puesto, dia1, mes1, año1, dia2, mes2, año2, dia3, mes3, año3) {
    const image = await loadImage("sol_vac.jpg");

    const pdf = new jsPDF('p', 'pt', 'letter');

    pdf.addImage(image, 'JPG', 0, 0, 585, 792);

    pdf.setFontSize(10);
    pdf.text(fechasol, 435, 120);
    pdf.text(nombre, 120, 170);
    pdf.text(dptto, 155, 188);
    pdf.text(fechaing, 180, 208);
    pdf.text(numeroemp, 438, 170);

    pdf.text(puesto, 400, 188);

    pdf.setFontSize(8);
    pdf.text(dia1, 218, 431);
    pdf.text(mes1, 282, 431);
    pdf.text(año1, 342, 431);

    pdf.text(dia2, 218, 461);
    pdf.text(mes2, 282, 461);
    pdf.text(año2, 342, 461);

    pdf.text(dia3, 218, 491);
    pdf.text(mes3, 282, 491);
    pdf.text(año3, 342, 491);

    pdf.save("Solicitud_Vacaciones.pdf");
}