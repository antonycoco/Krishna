<script>
/*    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }*/

function connect(oElem, sEvType, fn, bCapture)
{
    return document.addEventListener ?
        oElem.addEventListener(sEvType, fn, bCapture):
        oElem.attachEvent ?
            oElem.attachEvent('on' + sEvType, fn):
            false;
}

function chargerFonction()
{
    if(document.getElementById('download'))
        return document.getElementById('download').onclick = recupId;
    return alert ("il n'y a pas d'element download")

}
function recupHref() {
    if(this.href)
        return alert(this.href);
    return alert('erreur')
}

function recupId()
{
    if(this.id)
        return alert(this.id);
    return alert ("il n'y a pas d'element href enregistrable");
}

connect(window, 'load', chargerFonction, false);

</script>
