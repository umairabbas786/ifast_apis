package com.electrodragon.i_fast_api.model.network.core

class BadRequest {
    var missingParam: String? = null
    var invalidValueOfParam: String? = null

    fun getMoreInfo(callbacks: BadRequestCallbacks) {
        when {
            missingParam != null -> callbacks.onMissingParam(missingParam!!)
            invalidValueOfParam != null -> callbacks.onInvalidValueOfParam(invalidValueOfParam!!)
            else -> callbacks.onDebugModeDisabled()
        }
    }
}

interface BadRequestCallbacks {
    fun onMissingParam(param: String)
    fun onInvalidValueOfParam(param: String)
    fun onDebugModeDisabled()
}
