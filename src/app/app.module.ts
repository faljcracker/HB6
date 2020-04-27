import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AgmCoreModule } from '@agm/core';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TopNavComponent } from './top-nav/top-nav.component';
import { FooterComponent } from './footer/footer.component';
import { MapsComponent } from './maps/maps.component';
import { TrackingComponent } from './tracking/tracking.component';
import { ServicesComponent } from './services/services.component';
import { AboutComponent } from './about/about.component';
import { ContactComponent } from './contact/contact.component';

@NgModule({
  declarations: [
    AppComponent,
    TopNavComponent,
    FooterComponent,
    MapsComponent,
    TrackingComponent,
    ServicesComponent,
    AboutComponent,
    ContactComponent
  ],
  imports: [
    BrowserModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyAKmzlmATSxTIOUHagK35K5YAGwGLfI_a4'
    }),
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
