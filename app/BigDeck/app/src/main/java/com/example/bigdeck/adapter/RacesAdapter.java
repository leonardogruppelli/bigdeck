package com.example.bigdeck.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.bigdeck.R;
import com.example.bigdeck.model.RacesModel;

import java.util.List;

public class RacesAdapter extends ArrayAdapter<RacesModel> {

    List<RacesModel> raceList;
    Context context;
    private LayoutInflater inflater;

    public RacesAdapter(Context context, List<RacesModel> objects) {
        super(context, 0, objects);
        this.context = context;
        this.inflater = LayoutInflater.from(context);
        raceList = objects;
    }

    @Override
    public RacesModel getItem(int position) {
        return raceList.get(position);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        final ViewHolder vh;
        if (convertView == null) {
            View view = inflater.inflate(R.layout.activity_races, parent, false);
            vh = ViewHolder.create((RelativeLayout) view);
            view.setTag(vh);
        } else {
            vh = (ViewHolder) convertView.getTag();
        }

        RacesModel item = getItem(position);

        vh.textViewName.setText(item.getName());

        return vh.rootView;
    }

    private static class ViewHolder {
        public final RelativeLayout rootView;
        public final TextView textViewName;

        private ViewHolder(RelativeLayout rootView, TextView textViewName) {
            this.rootView = rootView;
            this.textViewName = textViewName;
        }

        public static ViewHolder create(RelativeLayout rootView) {
            TextView textViewName = rootView.findViewById(R.id.textViewName);
            return new ViewHolder(rootView, textViewName);
        }
    }
}
