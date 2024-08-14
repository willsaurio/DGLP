console.log("Script loaded");

document.addEventListener("DOMContentLoaded", function() {
    // Coloca todo tu código JavaScript aquí
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Registrar";
      } else {
        document.getElementById("nextBtn").innerHTML = "Siguiente";
      }
      fixStepIndicator(n);
    }

    function nextPrev(n) {
      var x = document.getElementsByClassName("tab");
      if (n == 1 && !validateForm()) return false;
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      if (currentTab >= x.length) {
        document.getElementById("regForm").submit();
        return false;
      }
      showTab(currentTab);
    }

    function validateForm() {
      var x, y, z, i, valid = true;
      x = document.getElementsByClassName("tab");
    
      // Obtiene todos los inputs en la pestaña actual
      y = x[currentTab].getElementsByTagName("input");
    
      // Valida los inputs
      for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
          y[i].className += " invalid";
          valid = false;
        }
      }
    
      // Obtiene todos los selects en la pestaña actual
      z = x[currentTab].getElementsByTagName("select");
    
      // Valida los select normales y Select2
      for (i = 0; i < z.length; i++) {
        if ($(z[i]).val() == null || $(z[i]).val() == "") {
          $(z[i]).next('.select2').find('.select2-selection').addClass("invalid");
          valid = false;
        } else {
          $(z[i]).next('.select2').find('.select2-selection').removeClass("invalid");
        }
      }
    
      // Si es válido, marca el paso como terminado
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
    
      return valid;
    }
    

    function fixStepIndicator(n) {
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      x[n].className += " active";
    }

    document.getElementById("prevBtn").onclick = function() {
      nextPrev(-1);
    };

    document.getElementById("nextBtn").onclick = function() {
      nextPrev(1);
    };
});
