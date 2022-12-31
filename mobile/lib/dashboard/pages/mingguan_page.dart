import 'package:flutter/material.dart';
import 'package:proyek3_mobile/dashboard/pages/penilaian_page.dart';
import 'package:proyek3_mobile/services/http.dart';
import 'package:proyek3_mobile/services/model_data/mingguan.dart';
import '../widget/widget_menu.dart';

class MingguanPage extends StatefulWidget {
  final int? semester;

  MingguanPage({this.semester});

  @override
  State<MingguanPage> createState() => _MingguanPageState();
}

class _MingguanPageState extends State<MingguanPage> {
  List<Mingguan> listMingguan = [];
  Http http = Http();

  getDataMingguan() async {
    listMingguan = await http.getMingguan(widget.semester);
    setState(() {});
  }

  @override
  void initState() {
    // http.getSemester_1();
    getDataMingguan();
    // TODO: implement initState
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.cyan,
        title: Text(
          "Semester - " + widget.semester.toString(),
        ),
      ),
      body: Container(
        child: ListView.builder(
          itemCount: listMingguan.length,
          itemBuilder: (context, index) {
            // Jika data mingguan Kosong
            if (listMingguan[index].minggu_ke == 0) {
              return Container(
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  children: [
                    SizedBox(
                      height: 20,
                    ),
                    _judul("Belum Ada Data Penilaian"),
                  ],
                ),
              );
            } else {
              return SingleChildScrollView(
                child: ExpansionTile(
                  title: Row(
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        "Minggu Ke - ",
                        style: TextStyle(
                          fontSize: 20,
                          // color: Colors.cyan
                        ),
                      ),
                      Text(
                        "${listMingguan[index].minggu_ke.toString()}",
                        style: TextStyle(fontSize: 22, color: Colors.cyan),
                      ),
                    ],
                  ),
                  children: [
                    SizedBox(
                      height: 5,
                    ),
                    _card(
                        "${listMingguan[index].tema}",
                        "${listMingguan[index].sub_tema}",
                        "${listMingguan[index].tema}",
                        "${listMingguan[index].sub_tema}",
                        int.parse("${listMingguan[index].minggu_ke}"),
                        widget.semester),
                    SizedBox(
                      height: 10,
                    ),
                  ],
                ),
              );
            }
          },
        ),
      ),
    );
  }

  Widget _judul(String name) {
    return Container(
      width: MediaQuery.of(context).size.width * 0.80, //80% of width,
      child: Center(
        child: Text(
          name,
          textAlign: TextAlign.center,
          style: TextStyle(
              color: Colors.cyan, fontSize: 25, fontWeight: FontWeight.w800),
        ),
      ),
    );
  }

  Widget _card(String judul, String value, String tema, String sub_tema,
      int? minggu_ke, int? semester) {
    return GestureDetector(
      onTap: () => Navigator.of(context).push(MaterialPageRoute(
        builder: (context) => PenilaianPage(
          tema: tema,
          sub_tema: sub_tema,
          minggu_ke: minggu_ke,
          semester: semester,
        ),
      )),
      child: Card(
        child: Padding(
          padding: const EdgeInsets.symmetric(
            horizontal: 10.0,
            vertical: 10.0,
          ),
          child: Row(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: <Widget>[
              SizedBox(width: 5.0),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                  Text(
                    "Tema : " + judul,
                    style: TextStyle(
                      color: Colors.cyan,
                      fontSize: 16.0,
                    ),
                  ),
                  SizedBox(height: 4.0),
                  Text(
                    "Sub Tema : " + value,
                    style: TextStyle(
                      // color: Colors.grey[700],
                      fontSize: 18.0,
                    ),
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
