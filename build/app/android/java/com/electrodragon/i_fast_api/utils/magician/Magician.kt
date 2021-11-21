package com.electrodragon.i_fast_api.utils.magician

import com.google.crypto.tink.Aead
import com.google.crypto.tink.subtle.Base64

class Magician(
    private val aead: Aead,
    private val secret: ByteArray
) {
    fun encrypt(content: String, secretKey: String): String {
        return encrypt(content, secretKey.toByteArray())
    }

    private fun encrypt(content: String, secretKey: ByteArray): String {
        return Base64.encode(aead.encrypt(content.toByteArray(), secretKey))
    }

    fun encrypt(content: String): String {
        return encrypt(content, secret)
    }

    fun decrypt(cipherText: String): String {
        return decrypt(cipherText, secret)
    }

    fun decrypt(cipherText: String, secretKey: String): String {
        return decrypt(cipherText, secretKey.toByteArray())
    }

    private fun decrypt(cipherText: String, secretKey: ByteArray): String {
        return String(aead.decrypt(Base64.decode(cipherText), secretKey))
    }

}
