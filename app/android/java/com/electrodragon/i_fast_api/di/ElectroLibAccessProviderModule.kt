package com.electrodragon.i_fast_api.di

import com.electrodragon.i_fast_api.provider.ElectroLibAccessProvider
import dagger.Module
import dagger.Provides
import dagger.hilt.InstallIn
import dagger.hilt.components.SingletonComponent
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
class ElectroLibAccessProviderModule {
    @Provides
    @Singleton
    fun provideElectroLibAccessProviderModule(): ElectroLibAccessProvider {
        return ElectroLibAccessProvider()
    }
}
