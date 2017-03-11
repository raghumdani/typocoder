#include <bits/stdc++.h>
using namespace std;

vector<int> l[100009];
int vis[100009];

void dfs(int ver){
    int i,j,t1,t2;
    vis[ver]=1;
    for(i=0;i<l[ver].size();i++){
        t1=l[ver][i];
        if(vis[t1]==-1){
            dfs(t1);
        }
    }
}

int main() {
	int i,j,t1,t2,t3,t4,t,n,ans,m;
	scanf("%d %d",&n,&m);
	memset(vis,-1,sizeof(vis));
	for(i=0;i<m;i++){
	    scanf("%d %d",&t1,&t2);
	    l[t1].push_back(t2);
	    l[t2].push_back(t1);
	}
	ans=0;
	for(i=1;i<=n;i++){
	    if(vis[i]==-1){
	       ans++;
	       dfs(i);
	    }
	}
	printf("%d\n",ans);
	return 0;
}
