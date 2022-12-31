class Mingguan {
  final String? tema, sub_tema, minggu_ke;

  Mingguan({this.minggu_ke, this.tema, this.sub_tema});

  factory Mingguan.fromJson(Map<String, dynamic> json) {
    return Mingguan(
        minggu_ke: json['minggu_ke'],
        tema: json['tema'],
        sub_tema: json['sub_tema']);
  }
}
