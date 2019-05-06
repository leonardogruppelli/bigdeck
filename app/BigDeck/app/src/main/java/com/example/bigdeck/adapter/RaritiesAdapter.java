package com.example.bigdeck.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.bigdeck.R;
import com.example.bigdeck.model.RaritiesModel;

import java.util.List;

public class RaritiesAdapter extends ArrayAdapter<RaritiesModel> {

    List<RaritiesModel> rarityList;
    Context context;
    private LayoutInflater inflater;

    public RaritiesAdapter(Context context, List<RaritiesModel> objects) {
        super(context, 0, objects);
        this.context = context;
        this.inflater = LayoutInflater.from(context);
        rarityList = objects;
    }

    @Override
    public RaritiesModel getItem(int position) {
        return rarityList.get(position);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        final ViewHolder vh;
        if (convertView == null) {
            View view = inflater.inflate(R.layout.activity_rarities, parent, false);
            vh = ViewHolder.create((RelativeLayout) view);
            view.setTag(vh);
        } else {
            vh = (ViewHolder) convertView.getTag();
        }

        RaritiesModel item = getItem(position);

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
