package com.electrodragon.i_fast_api.model.network.core

import com.electrodragon.i_fast_api.model.network.constant.ApiResponseConstant
import com.google.gson.annotations.SerializedName

data class ElectroResponse<T>(
    @SerializedName(ApiResponseConstant.RESPONSE_STATE) val responseState: String,
    @SerializedName(ApiResponseConstant.DATA) val data: T?
)
