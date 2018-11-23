import * as moment from 'moment';

export interface User {
  id: string;
  username: string;
  thumbnail_url?: string;
}

export class CompleteUser {
  private readonly _id?: string;
  private readonly _username: string;
  private readonly _first_name: string;
  private readonly _last_name: string;
  private readonly _password: string;
  private readonly _email: string;
  private readonly _thumbnail_url?: string;
  private readonly _created_at?: moment.Moment;
  private readonly _created_by?: string;
  private readonly _modified_at?: moment.Moment;
  private readonly _modified_by?: string;
  private readonly _archived_at?: moment.Moment;
  private readonly _archived_by?: string;

  constructor(
    username: string,
    first_name: string,
    last_name: string,
    password: string,
    email: string,
    thumbnail_url?: string,
    created_at?: moment.Moment,
    created_by?: string,
    modified_at?: moment.Moment,
    modified_by?: string,
    archived_at?: moment.Moment,
    archived_by?: string,
    id?: string,
  ) {
    this._id = id;
    this._username = username;
    this._first_name = first_name;
    this._last_name = last_name;
    this._password = password;
    this._email = email;
    this._thumbnail_url = thumbnail_url;
    this._created_at = created_at;
    this._created_by = created_by;
    this._modified_at = modified_at;
    this._modified_by = modified_by;
    this._archived_at = archived_at;
    this._archived_by = archived_by;
  }

  get id(): string {
    return this._id;
  }

  get username(): string {
    return this._username;
  }

  get first_name(): string {
    return this._first_name;
  }

  get last_name(): string {
    return this._last_name;
  }

  get password(): string {
    return this._password;
  }

  get email(): string {
    return this._email;
  }

  get thumbnail_url(): string {
    return this._thumbnail_url;
  }

  get created_at(): moment.Moment {
    return this._created_at;
  }

  get created_by(): string {
    return this._created_by;
  }

  get modified_at(): moment.Moment {
    return this._modified_at;
  }

  get modified_by(): string {
    return this._modified_by;
  }

  get archived_at(): moment.Moment {
    return this._archived_at;
  }

  get archived_by(): string {
    return this._archived_by;
  }

  public toJSON() {
    const data = {
      username: this.username,
      password: this.password,
      firstname: this.first_name,
      lastname: this.last_name,
      email: this.email,
    };
    if (this.thumbnail_url) {
      data['thumbnail_url'] = this.thumbnail_url;
    }
    if (this.id) {
      data['id'] = this.id;
    }
    if (this.created_at) {
      data['created_at'] = this.created_at;
    }
    if (this.created_by) {
      data['created_by'] = this.created_by;
    }
    if (this.modified_at) {
      data['modified_at'] = this.modified_at;
    }
    if (this.modified_by) {
      data['modified_by'] = this.modified_by;
    }
    if (this.archived_at) {
      data['archived_at'] = this.archived_at;
    }
    if (this.archived_by) {
      data['archived_by'] = this.archived_by;
    }
    return JSON.stringify(data);
  }
}
