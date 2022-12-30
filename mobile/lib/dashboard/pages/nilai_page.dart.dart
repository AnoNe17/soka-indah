import 'package:flutter/material.dart';
import 'package:proyek3_mobile/dashboard/pages/mingguan_page.dart';
import 'package:proyek3_mobile/dashboard/pages/penilaian_page.dart';
import 'package:proyek3_mobile/services/http.dart';
import 'package:proyek3_mobile/services/model_data/mingguan.dart';
import '../widget/widget_menu.dart';

class NilaiPage extends StatefulWidget {
  const NilaiPage({Key? key}) : super(key: key);

  @override
  State<NilaiPage> createState() => _NilaiPageState();
}

class _NilaiPageState extends State<NilaiPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.cyan,
        title: Text('Halaman Nilai'),
        leading: MenuWidget(),
      ),
      body: Container(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            SizedBox(
              height: 15,
            ),
            _profileName("Silahkan Pilih Semester : "),
            SizedBox(
              height: 15,
            ),
            _card(1),
            SizedBox(
              height: 5,
            ),
            _card(2),
          ],
        ),
      ),
    );
  }

  Widget _profileName(String name) {
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

  Widget _card(int? semester) {
    return GestureDetector(
      onTap: () => Navigator.of(context).push(MaterialPageRoute(
          builder: (context) => MingguanPage(
                semester: semester,
              ))),
      child: Card(
        child: Padding(
          padding: const EdgeInsets.symmetric(
            horizontal: 30.0,
            vertical: 30.0,
          ),
          child: Row(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: <Widget>[
              SizedBox(width: 5.0),
              Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                mainAxisSize: MainAxisSize.max,
                children: <Widget>[
                  Center(
                    child: Text(
                      "Semester - " + semester.toString(),
                      style: TextStyle(
                        color: Colors.cyan,
                        fontSize: 25.0,
                      ),
                    ),
                  )
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
