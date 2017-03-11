#include<bits/stdc++.h>
using namespace std;
int n,m,dist[105][105];
pair<int,int> startpt,endpt;
char a[105][105];
void bfs(){
    dist[startpt.first][startpt.second]=0;
    queue<pair<int,int> > Q;
    Q.push(startpt);
    while(!Q.empty()){
        pair<int,int> u=Q.front();
        Q.pop();
        if(u.first>0 && dist[u.first-1][u.second]==-1 && a[u.first-1][u.second]!='*'){
            dist[u.first-1][u.second]=dist[u.first][u.second]+1;
            Q.push(make_pair(u.first-1,u.second));
        }
        if(u.first<n - 1 && dist[u.first+1][u.second]==-1 && a[u.first+1][u.second]!='*'){
            dist[u.first+1][u.second]=dist[u.first][u.second]+1;
            Q.push(make_pair(u.first+1,u.second));
        }
        if(u.second>0 && dist[u.first][u.second-1]==-1 && a[u.first][u.second-1]!='*' ){
            dist[u.first][u.second-1]=dist[u.first][u.second]+1;
            Q.push(make_pair(u.first,u.second-1));
        }
        if(u.second<m - 1 && dist[u.first][u.second+1]==-1 && a[u.first][u.second+1]!='*'){
            dist[u.first][u.second+1]=dist[u.first][u.second]+1;
            Q.push(make_pair(u.first,u.second+1));
        }    
    }
}
int main(){
    int t;
    freopen("4_input.txt", "r", stdin);
    freopen("out.txt", "w", stdout);
    scanf("%d",&t);
    while(t--){
        scanf("%d %d",&n,&m);
        for(int i=0;i<n;i++)
            scanf(" %s",a[i]);
        for(int i=0;i<n;i++)
            for(int j=0;j<m;j++)
                if(a[i][j]=='U'){
                startpt=make_pair(i,j);
                break;
        }
        memset(dist,-1,sizeof(dist));
        bfs();
        int ans=INT_MAX;
        for(int i=0;i<n;i++)
            for(int j=0;j<m;j++)
                if(a[i][j]=='E')
                    ans=min(ans,dist[i][j]);
        if(ans==INT_MAX)
            printf("-1\n");
        else
            printf("%d\n",ans);

    }
    return 0;
}
