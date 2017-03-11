#include<bits/stdc++.h>
using namespace std;
int main()
{
    int i,n,m,c=0,a,b,x,j;
    queue<int> Q;
    scanf("%d %d",&n,&m);
    vector<int> g[n];
    for(i=0;i<m;i++)
    {
     scanf("%d %d",&a,&b);
        a--;
        b--;
     g[a].push_back(b);
     g[b].push_back(a);
    }
   /* for(i=0;i<n;i++)
    {
        printf("%d ",i+1);
        for(j=0;j<g[i].size();j++)
        printf("%d ",g[i][j]+1);
        printf("\n");
    }*/
    int exp[n]={0};
    for(i=0;i<n;i++)
    {
        if(exp[i]==0)
         {
                Q.push(i);
                exp[i]=1;
                c++;
                while(Q.empty()==0)
                {       
                x=Q.front();
                for(j=0;j<g[x].size();j++)
                {   
                 if(exp[g[x][j]]==0)
                 {Q.push(g[x][j]);
                 exp[g[x][j]]=1;}
                }
                Q.pop();
                }
        }
    }
    printf("%d",c);
    }