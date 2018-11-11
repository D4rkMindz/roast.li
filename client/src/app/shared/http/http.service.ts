import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '@env/environment';

@Injectable({
  providedIn: 'root'
})
export class HttpService {
  constructor(private http: HttpClient) {}

  get(url: string) {
    url = environment.serverUrl + url;
    return this.http.get(url, { withCredentials: true });
  }

  post(url: string, data: any) {
    url = environment.serverUrl + url;
    return this.http.post(url, data, { withCredentials: true });
  }

  put(url: string, data: any) {
    url = environment.serverUrl + url;
    return this.http.put(url, data, { withCredentials: true });
  }

  delete(url: string) {
    url = environment.serverUrl + url;
    return this.http.delete(url, { withCredentials: true });
  }
}
