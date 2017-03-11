#include<bits/stdc++.h>
using namespace std;
char a[52][52];int visited[55][55];
int main()
{
	int T;
	scanf("%d",&T);
	while(T--)
	{  
		int M,N;
		memset(visited,-1,sizeof(visited));
		scanf("%d%d",&N,&M);
		int i,j,x0,y0,x1,y1,flag=0;
		
		for (i=0;i<N;i++)
		{
			scanf("%s",a[i]);
		}
		
		for (i=0;i<N;i++)
		{
			for (j=0;j<M;j++)
			{
				if(a[i][j]=='U')
				{x0=i;y0=j;
				}
				if(a[i][j]=='E')
				{
					x1=i;y1=j;
					flag=1;
				}
			}
		}
		
		
		queue<pair<int,int> >Q;
		Q.push(make_pair(x0,y0));
		visited[x0][y0]=0;
		while(Q.size()>0)
		{
			pair<int,int>p;
			p=Q.front();
			int t1=p.first;
			int t2=p.second;
		    Q.pop();
			if(t1<N-1 && (a[t1+1][t2]=='.' || a[t1+1][t2]=='E') && visited[t1+1][t2]==-1)
			{
				visited[t1+1][t2]=visited[t1][t2]+1;
			//	printf("Haha\n");
				Q.push(make_pair(t1+1,t2));
			}
			
			if(t1>0 && (a[t1-1][t2]=='.' || a[t1-1][t2]=='E')&& visited[t1-1][t2]==-1)
			{
				visited[t1-1][t2]=visited[t1][t2]+1;
				Q.push(make_pair(t1-1,t2));
			}
			
			if(t2<M-1 && (a[t1][t2+1]=='.'|| a[t1][t2+1]=='E') && visited[t1][t2+1]==-1)
			{
				visited[t1][t2+1]=visited[t1][t2]+1;
				Q.push(make_pair(t1,t2+1));
			}
			
			if(t2>0 && (a[t1][t2-1]=='.'|| a[t1][t2-1]=='E') && visited[t1][t2-1]==-1)
			{
				visited[t1][t2-1]=visited[t1][t2]+1;
				Q.push(make_pair(t1,t2-1));
			}
		}
		/*for (i=0;i<N;i++)
		{
			for (j=0;j<M;j++)
			printf("%d ",visited[i][j]);
			printf("\n");
		}*/
		if(flag==0)
		printf("-1\n");
		else 
		{
			int ans=800000;
			for (i=0;i<N;i++)
			{
				for (j=0;j<M;j++)
				{
					if(visited[i][j]!=-1 && a[i][j]=='E')
					{
						ans=min(ans,visited[i][j]);
					}
				}
			}
			if(ans==800000)
			printf("-1\n");
			else printf("%d\n",ans);
		}
	}
}