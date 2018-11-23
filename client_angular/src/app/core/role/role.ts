export class Role {
  private readonly _name: string;
  private readonly _position: string;

  constructor(name: string, position: string) {
    this._name = name;
    this._position = position;
  }

  get name(): string {
    return this._name;
  }

  get position(): string {
    return this._position;
  }

  public toJSON(): string {
    return JSON.stringify({name: this.name, position: this.position});
  }
}
