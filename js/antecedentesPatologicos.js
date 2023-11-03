function antPat1() {
    var seleccion = document.querySelector('input[name="intQuir"]:checked').value;
    var descripcionInput = document.getElementById('intQuirDesc');
    var descripcionCampo = document.getElementById('intQuirDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat2() {
    var seleccion = document.querySelector('input[name="tratMed"]:checked').value;
    var descripcionInput = document.getElementById('tratMedDesc');
    var descripcionCampo = document.getElementById('tratMedDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat3() {
    var seleccion = document.querySelector('input[name="mediAct"]:checked').value;
    var descripcionInput = document.getElementById('mediActDesc');
    var descripcionCampo = document.getElementById('mediActDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat4() {
    var seleccion = document.querySelector('input[name="reacAnes"]:checked').value;
    var descripcionInput = document.getElementById('reacAnesDesc');
    var descripcionCampo = document.getElementById('reacAnesDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat5() {
    var seleccion = document.querySelector('input[name="herHem"]:checked').value;
    var descripcionInput = document.getElementById('herHemDesc');
    var descripcionCampo = document.getElementById('herHemDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat6() {
    var seleccion = document.querySelector('input[name="cortHer"]:checked').value;
    var descripcionInput = document.getElementById('cortHerDesc');
    var descripcionCampo = document.getElementById('cortHerDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat7() {
    var seleccion = document.querySelector('input[name="alerMed"]:checked').value;
    var descripcionInput = document.getElementById('alerMedDesc');
    var descripcionCampo = document.getElementById('alerMedDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat8() {
    var seleccion = document.querySelector('input[name="desmFrec"]:checked').value;
    var descripcionInput = document.getElementById('desmFrecDesc');
    var descripcionCampo = document.getElementById('desmFrecDesc');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');
    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
    }
}
function antPat9() {
    var seleccion = document.querySelector('input[name="emb"]:checked').value;
    var descripcionInput = document.getElementById('embDesc');
    var descripcionCampo = document.getElementById('gestacion');
    var descripcionCampo2 = document.getElementById('upm');

    if (seleccion === 'si') {
        descripcionInput.style.display = 'block';
        descripcionCampo.setAttribute('required', 'required');

    } else {
        descripcionInput.style.display = 'none';
        descripcionCampo.removeAttribute('required');
        descripcionCampo.value = '';
        descripcionCampo2.removeAttribute('required');
        descripcionCampo2.value = '';
    }
}

function mostrarDescripcion(idenf) {
    var descripcionInput = document.getElementById('descripcion_' + idenf);
    var checkbox = document.querySelector('input[value="' + idenf + '"]');
    
    if (checkbox.checked) {
        descripcionInput.style.display = 'block';
    } else {
        descripcionInput.style.display = 'none';
    }
}