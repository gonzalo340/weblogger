<?php
/* Se ejecuta antes de registrar el log. Retornar true para guardar el registro. */
function register_beforeFilter(){
	return DEFAULT_RETURN_REGISTER_BEFORE;
}

/* Se ejecuta antes de realizar las condiciones. Retornar true para realizar las condiciones. */
function conditions_beforeFilter(){
	return DEFAULT_RETURN_CONDITIONS_BEFORE;
}
