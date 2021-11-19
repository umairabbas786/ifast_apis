package com.electrodragon.i_fast_api.model.network.core;

import java.io.File;
import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;

public class MultipartHelper {
    public static RequestBody createRequestBody(String payload) {
        return RequestBody.create(payload, MediaType.parse("multipart/form-data"));
    }

    /**
     * @param partKey: server identifier for its file.
     * @param imageName: original name of image.
     * @param image: file pointing to real image
     */
    public static MultipartBody.Part createMultipartBodyPartImage(String partKey, String imageName, File image) {
        RequestBody requestBody = RequestBody.create(image, MediaType.parse("image/*"));
        return MultipartBody.Part.createFormData(partKey, imageName, requestBody);
    }
}
