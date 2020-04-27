import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-maps',
  templateUrl: './maps.component.html',
  styleUrls: ['./maps.component.scss']
})
export class MapsComponent implements OnInit {

  lat = 40.730610;
  lng = -73.935242;

  constructor() { }

  ngOnInit() {
  }


}
