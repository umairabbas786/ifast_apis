#include <jni.h>
#include <string>

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_i_1fast_1api_1admin_provider_ElectroLibAccessProvider_getMasterKey(JNIEnv* env, jobject _j) {
    std::string s = "7b227072696d6172794b65794964223a323032323437373531382c226b6579223a5b7b226b657944617461223a7b227479706555726c223a22747970652e676f6f676c65617069732e636f6d2f676f6f676c652e63727970746f2e74696e6b2e41657347636d4b6579222c2276616c7565223a2247694472595674792f43773566764157476c683372487369553553697769685654534941526a4d4e77336b4c38773d3d222c226b65794d6174657269616c54797065223a2253594d4d4554524943227d2c22737461747573223a22454e41424c4544222c226b65794964223a323032323437373531382c226f757470757450726566697854797065223a2254494e4b227d5d7d";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_i_1fast_1api_1admin_provider_ElectroLibAccessProvider_getSecretKey(JNIEnv* env, jobject _j) {
    std::string s = "19XNGLNVWP8UMHT9JNZ0OQXQPJNM6IF7JBJGEXB6Y82RG6YW4R6GPZHZPXPB7Q4OT873A4";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_i_1fast_1api_1admin_provider_ElectroLibAccessProvider_getServerBaseUrl(JNIEnv* env, jobject _j) {
    std::string s = "https://api.i_fast_api.com/";
    return env->NewStringUTF(s.c_str());
}

extern "C" JNIEXPORT jstring JNICALL
Java_com_electrodragon_i_1fast_1api_1admin_provider_ElectroLibAccessProvider_getServerApiKey(JNIEnv* env, jobject _j) {
    std::string s = "hi,-its-eevee. I can do wonderful things in api creation.";
    return env->NewStringUTF(s.c_str());
}
