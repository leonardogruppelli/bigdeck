package com.example.bigdeck;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.ListView;
import android.widget.TextView;

import com.example.bigdeck.adapter.ClassesAdapter;
import com.example.bigdeck.model.ClassesModel;
import com.example.bigdeck.parser.JSONParser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class ClassesActivity extends AppCompatActivity {
    private ListView listView;
    private ArrayList<ClassesModel> list;
    private ClassesAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);

        TextView title = findViewById(R.id.textTitle);
        title.setText("Card Classes");

        list = new ArrayList<>();
        adapter = new ClassesAdapter(this, list);

        listView = findViewById(R.id.listView);
        listView.setAdapter(adapter);

        new GetDataTask().execute();
    }

    class GetDataTask extends AsyncTask<Void, Void, Void> {

        ProgressDialog dialog;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            dialog = new ProgressDialog(ClassesActivity.this);
            dialog.setTitle("Please wait...");
            dialog.setMessage("Loading JSON");
            dialog.show();
        }

        @Override
        protected Void doInBackground(Void... params) {

            JSONObject jsonObject = JSONParser.getDataFromWeb("http://10.0.2.2/bigdeck/webservices/classes");

            try {
                if (jsonObject != null) {
                    if(jsonObject.length() > 0) {
                        JSONArray array = jsonObject.getJSONArray("classes");

                        int lenArray = array.length();
                        if(lenArray > 0) {
                            for(int i = 0; i < lenArray; i++) {
                                ClassesModel model = new ClassesModel();

                                JSONObject innerObject = array.getJSONObject(i);
                                String name = innerObject.getString("name");

                                model.setName(name);

                                list.add(model);
                            }
                        }
                    }
                }
            } catch (JSONException je) {
                Log.i("Error", "" + je.getLocalizedMessage());
            }
            return null;
        }

        @Override
        protected void onPostExecute(Void aVoid) {
            super.onPostExecute(aVoid);
            dialog.dismiss();
            if(list.size() > 0) {
                adapter.notifyDataSetChanged();
            }
        }
    }
}
