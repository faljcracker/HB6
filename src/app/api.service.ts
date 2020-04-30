import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Policy } from  './policy';
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private httpClient: HttpClient) { }
}
