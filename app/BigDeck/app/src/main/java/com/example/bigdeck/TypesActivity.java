package com.example.bigdeck;

import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.ListView;
import android.widget.TextView;

import com.example.bigdeck.adapter.TypesAdapter;
import com.example.bigdeck.model.TypesModel;
import com.example.bigdeck.parser.JSONParser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class TypesActivity extends AppCompatActivity {
    private ListView listView;
    private ArrayList<TypesModel> list;
    private TypesAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);

        TextView title = findViewById(R.id.textTitle);
        title.setText("Card Types");

        list = new ArrayList<>();
        adapter = new TypesAdapter(this, list);

        listView = findViewById(R.id.listView);
        listView.setAdapter(adapter);

        new GetDataTask().execute();
    }

    class GetDataTask extends AsyncTask<Void, Void, Void> {

        ProgressDialog dialog;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            dialog = new ProgressDialog(TypesActivity.this);
            dialog.setTitle("Please wait...");
            dialog.setMessage("Loading JSON");
            dialog.show();
        }

        @Override
        protected Void doInBackground(Void... params) {

            JSONObject jsonObject = JSONParser.getDataFromWeb("http://10.0.2.2/bigdeck/webservices/types");

            try {
                if (jsonObject != null) {
                    if(jsonObject.length() > 0) {
                        JSONArray array = jsonObject.getJSONArray("types");

                        int lenArray = array.length();
                        if(lenArray > 0) {
                            for(int i = 0; i < lenArray; i++) {
                                TypesModel model = new TypesModel();

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
