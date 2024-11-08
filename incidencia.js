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

    const form = document.querySelector('#form');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let nombre = document.getElementById('nombre').value;
        let curp = document.getElementById('curp').value;
        let ocupacion = document.getElementById('ocupacion').value;
        let puesto = document.getElementById('puesto').value;
        let razon = document.getElementById('razon').value;
        let rfc = document.getElementById('rfc').value;
        let curso = document.getElementById('curso').value;
        let horas = document.getElementById('horas').value;
        let año = document.getElementById('año').value;
        let mes = document.getElementById('mes').value;
        let dia = document.getElementById('dia').value;
        let año2 = document.getElementById('año2').value;
        let mes2 = document.getElementById('mes2').value;
        let dia2 = document.getElementById('dia2').value;
        let tematica = document.getElementById('tematica').value;
        let agente = document.getElementById('agente').value;
        let instructor = document.getElementById('instructor').value;
        let patron = document.getElementById('patron').value;

        generatePDF(nombre, curp, ocupacion, puesto, razon, rfc, curso, horas, año, mes, dia, año2, mes2, dia2, tematica, agente, instructor, patron);
    })

});

async function generatePDF(nombre, curp, ocupacion, puesto, razon, rfc, curso, horas, año, mes, dia, año2, mes2, dia2, tematica, agente, instructor, patron) {
    const image = await loadImage("incidencia.jpg");

    const pdf = new jsPDF('p', 'pt', 'letter');

    pdf.addImage(image, 'PNG', 0, 0, 565, 792);

    pdf.setFontSize(10);
    pdf.text(nombre, 60, 165);
    pdf.text(curp, 60, 193);
    pdf.text(ocupacion, 267, 193);
    pdf.text(puesto, 60, 220);

    pdf.text(razon, 60, 283);
    pdf.text(rfc, 60, 310);

    pdf.text(curso, 60, 375);
    pdf.text(horas, 60, 413);
    pdf.text(año, 218, 413);
    pdf.text(mes, 275, 413);
    pdf.text(dia, 320, 413);

    pdf.text(año2, 373, 413);
    pdf.text(mes2, 427, 413);
    pdf.text(dia2, 482, 413);
    pdf.text(tematica, 60, 440);
    pdf.text(agente, 60, 470);

    pdf.text(instructor, 60, 580);

  
    pdf.text(patron, 218, 580);

    pdf.save("incidencia.pdf");
}