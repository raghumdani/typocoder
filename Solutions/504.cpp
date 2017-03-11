#include <bits/stdc++.h>
using namespace std;
set<int>s[100005];
int n;
bool visited[100004]={false};

int dfsvisit(int i){
    visited[i]=true;
    set<int>::iterator it;
    for(it=s[i].begin();it!=s[i].end();++it){
        if(visited[*it]==false){
            dfsvisit(*it);
        }
    }
}
int  dfs(){

    int c=0;
    for(int i=1;i<=n;++i){
        if(visited[i]==false){
            ++c;
            dfsvisit(i);
        }
    }
    return c;
}
int main(){
    long m;
    cin>>n>>m;
    while(m--){
        int u,v;
        cin>>u>>v;
        s[u].insert(v);
        s[v].insert(u);
    }
    cout<<dfs();
	return(0);
}
