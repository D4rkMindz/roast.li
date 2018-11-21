import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { CompleteUser } from "@app/core/user/user";
import { Observable } from "rxjs";

@Injectable({
  providedIn: "root"
})
export class UserService {
  constructor(private http: HttpClient) {}

  public register(user: CompleteUser): Observable<any> {
    return new Observable(observer => {
      console.log("[REGISTER] registering user");
      this.http.post("/user", user.toJSON()).subscribe(res => {
        observer.next(res);
        observer.complete();
        console.log("[REGISTER] got response");
        return res;
      });
    });
  }
}
